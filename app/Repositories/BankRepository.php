<?php

namespace App\Repositories;

use App\Model\Bank;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BankRepository
 * @package App\Repositories
 */
class BankRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bank::class;
    }
}
