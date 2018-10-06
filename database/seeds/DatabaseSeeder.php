<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $names = array('Admin','Manager','Employee');
        $descriptions = array('CRUD managers and employees.', 'Approves Leave.', 'Applies for leave.');

        foreach(range(0,2) as $i)
        {
            DB::table('roles')->insert([
                'name' => $names[$i],
                'Description' => $descriptions[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
/*
        //TODO :: Timestamps()
        DB::table('users')->insert([
            'username' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        */

/*
        DB::table('user_roles')->insert([
            'user_username' => str_random(10),
            'role_id' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('admins')->insert([
            'user_username' => str_random(10),
            'name' => str_random(10),
            'surname' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('managers')->insert([
            'user_username' => str_random(10),
            'name' => str_random(10),
            'surname' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('employees')->insert([
            'user_username' => str_random(10),
            'name' => str_random(10),
            'surname' => str_random(10),
            'leave_balance' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('leave_types')->insert([
            'leave_type' => str_random(10),
            'status' => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('leaves')->insert([
            'emp_username' => str_random(10),
            'leave_type' => str_random(10),
            'startDate' => '2018-01-01',
            'endDate' => '2018-01-15',
            'period' => 15,
            'status' => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
*/
    }
}


/*


coursesIDs = DB::table('courses')->pluck('id');
$studentsIDs= DB::table('students')->pluck('id');
and then you do:

        foreach (range(1,50) as $index) {
            DB::table('course_student')->insert([
            'course_id' => $faker->randomElement($coursesIDs)
            'student_id' => $faker->randomElement($studentsIDs)
            ]);
        }


*/
