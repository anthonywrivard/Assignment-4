<?php

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $status = ["Pending", "Completed", "Overdue", "Ongoing"];

        foreach ($status as $taskstatus) {
            $mystatus = new \App\TaskStatus();
            $mystatus->title = $taskstatus;
            $mystatus->save();
        }
    }

}
