<?php

namespace App\Repositories;
use App\Http\Controllers\Record;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class RecordRepositoriy
 * @package App\Repositories
 */
class RecordRepository implements RepositoryInterface
{

    public function getAll()
    {
        return \Db::table('record')->get();
    }

    public function getById(string $id)
    {
        // TODO: Implement getById() method.
    }

    public function getRecordTimeByDate($timestampDate)
    {
        $sql = 'SELECT
                    time.id,
                    time.time, 
                    user.name AS userName,
                    servise.name AS servise,
                    addServise.name AS addServise,
                    status.name AS status
                    
                    FROM time
                    
                    LEFT JOIN record ON time.id=record.time AND record.date=:timestampDate
                    
                    LEFT JOIN user ON record.user_id=user.id
                    
                    LEFT JOIN servise ON record.servise_id=servise.id
                    
                    LEFT JOIN servise AS addServise ON record.add_servise_id=addServise.id
                    
                    LEFT JOIN status ON record.status_id=status.id
                    
                    ORDER BY time.id ASC';

        return \DB::select($sql, [':timestampDate' => $timestampDate ] );
    }

    public function getAllRecordsByDate()
    {
        $sql = 'SELECT
                    `record`.`id`,
                    `date`,
                    `user`.`name` AS `userName`,
                    `phone` AS `userPhone`,
                    `time`.`time`,
                    `servise`.`name` AS `servise`,
                    `addServise`.`name` AS `addServise`,
                    `status`.`name` AS `status`
                    FROM `record` 
                    LEFT JOIN `user` ON `record`.`user_id`=`user`.`id` 
                    LEFT JOIN `servise` ON `record`.`servise_id`=`servise`.`id`
                    LEFT JOIN `servise` AS `addServise` ON `record`.`add_servise_id`=`addServise`.`id`
                    LEFT JOIN `time` ON `record`.`time`=`time`.`id`
                    LEFT JOIN `status` ON `record`.`status_id`=`status`.`id`';

        $sql = 'SELECT
                    `record`.`id`,
                    `date`,
                    `user`.`name` AS `userName`,
                    `phone` AS `userPhone`,
                    `time`.`time`,
                    `servise`.`name` AS `servise`,
                    `addServise`.`name` AS `addServise`,
                    `status`.`name` AS `status`
                    FROM `record` 
                    LEFT JOIN `user` ON `record`.`user_id`=`user`.`id` 
                    LEFT JOIN `servise` ON `record`.`servise_id`=`servise`.`id`
                    LEFT JOIN `servise` AS `addServise` ON `record`.`add_servise_id`=`addServise`.`id`
                    LEFT JOIN `time` ON `record`.`time`=`time`.`id`
                    LEFT JOIN `status` ON `record`.`status_id`=`status`.`id` WHERE `status`.`name`=new';


    }
}