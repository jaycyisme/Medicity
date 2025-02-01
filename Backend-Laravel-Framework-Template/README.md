## Project Setup Instructions

1. Environment Setup

- Rename `.env.example` to `.env`.
- Update MySQL credentials in `.env` file and APP_TIMEZONE=Asia/Ho_Chi_Minh
- Run the following command to install dependencies:

```
  composer update
```

- Generate the application key:

```
  php artisan key:generate
```

2. User Registration Customization

- Modify CreateNewUser class (`App\Actions\Fortify\CreateNewUser.php`):

```
    <?php

    namespace App\Actions\Fortify;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Laravel\Fortify\Contracts\CreatesNewUsers;
    use Laravel\Jetstream\Jetstream;

    class CreateNewUser implements CreatesNewUsers
    {
        use PasswordValidationRules;

        /**
        * Validate and create a newly registered user.
        *
        * @param  array<string, string>  $input
        */
        public function create(array $input): User
        {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ])->validate();

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            $user->syncRoles('Thành viên');
            return $user;
        }
    }
```

- Temporarily comment out the following line:

```
  $user->syncRoles('Thành viên');
```

3. Permissions Setup

- Modify PermissionTableSeeder (`Database\Seeders\PermissionTableSeeder.php`):

```
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

    class PermissionTableSeeder extends Seeder
    {
        /**
        * Run the database seeds.
        */
        public function run(): void
        {
            $permissions = [
                'dashboard-access',
                'role-list',
                'role-create',
                'role-edit',
                'role-delete',
                'permission-list',
                'permission-create',
                'permission-edit',
                'permission-delete',
                'users-list',
                'users-edit',
                'users-delete'
            ];

            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
            Permission::create(['name' => 'index-access']);

            $role = Role::create([
                'name' => 'Quản trị viên'
            ]);
            $role->syncPermissions($permissions);

            $user_role = Role::create([
                'name' => 'Thành viên'
            ]);
            $user_role->syncPermissions('index-access');
        }
    }
```

4. Update Guard Names

- Create UpdateGuardNameSeeder:

```
  php artisan make:seed UpdateGuardNameSeeder
```

- Add the following content to the seeder:

```
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;

    class UpdateGuardNameSeeder extends Seeder
    {
        /**
        * Run the database seeds.
        */
        public function run(): void
        {
            $permissions = Permission::where('guard_name', 'web')->get();

            foreach($permissions as $permission) {
                $permission->guard_name = 'sanctum';
                $permission->save();
            };

            $roles = Role::where('guard_name', 'web')->get();

            foreach($roles as $role) {
                $role->guard_name = 'sanctum';
                $role->save();
            }
        }
    }
```

5. Database Migration and Seeding

- Run migrations:

```
  php artisan migrate:refresh
```

- Seed the database:

```
  php artisan db:seed PermissionTableSeeder
  php artisan db:seed UpdateGuardNameSeeder
```

6. Frontend Setup

- Install dependencies and build assets:

```
  npm install
  npm run dev
  npm run build
```

## REGISTER FOR ADMIN

7. Authentication Setup

- Update the defaults section in `config/auth.php`:

```
  'defaults' => [
  'guard' => env('AUTH_GUARD', 'sanctum'),
  'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
  ],
```

8. Additional Seeders

- Seed additional data:

```
  php artisan db:seed PermissionTableAssign
  php artisan cache:clear
```

9. Finalizing User Registration

- Uncomment the following line in `CreateNewUser`:

```
  $user->syncRoles('Thành viên');
```

## REGISTER CONTINUE FOR USER

10. Routing

- Update `web.php`:

```
  Route::get('/', function () {
  return view('welcome');
  })->name('home-page');

  Route::group(['middleware' => ['can:dashboard-access']], function () {
  Route::get('/quan-tri-he-thong/bang-dieu-khien.html', function () {
  return view('dashboard');
  })->name('dashboard');
  });
```

11. Logout Feature

- Add logout functionality to `welcome.blade.php`:

```
  @if (Route::has('login'))
  <nav class="-mx-3 flex flex-1 justify-end">
  @auth
  @can('dashboard-access')
  <a href="{{ route('dashboard') }}" class="barlow1">BẢNG ĐIỀU KHIỂN</a>
  @endcan
  @else
  <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                >
  Log in
  </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Register
                    </a>
                @endif
            @endauth
        </nav>

  @endif

    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button class="pc-user-links" type="submit">
            <i class="ph-duotone ph-power"></i>
            <span>Đăng xuất</span>
        </button>
    </form>
```

12. Cache Optimization

- Optimize and clear caches:

```
  php artisan optimize:clear
```

13. Final Checks

- Test the application by registering and logging in to ensure all features work correctly.

14

- Install Intervention to optimize image.

```
  composer require intervention/image
```
