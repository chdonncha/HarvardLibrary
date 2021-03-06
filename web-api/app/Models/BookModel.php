<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class BookModel extends Model
{
    protected $table = 'Books';

    protected $fillable =
        [
            'created',
            'modified',
            'baseUrl',
            'collectionUrn',
            'contactDepartment',
            'contactName',
            'dcp',
            'systemId',
            'public',
            'setDescription',
            'setName',
            'setSpec',
            'thumbnailUrn',
        ];

    /**
     * @param $request
     */
    public static function addBooks($request)
    {
        $dataSet = [];

        foreach($request as $book)
        {
            $dataSet[] = [
                'created'           => $book->created,
                'modified'          => $book->modified,
                'baseurl'           => $book->baseUrl,
                'collectionUrn'     => $book->collectionUrn,
                'contactDepartment' => $book->contactDepartment,
                'contactName'       => $book->contactName,
                'dcp'               => $book->dcp,
                'systemId'          => $book->systemId,
                'public'            => $book->public,
                'setDescription'    => $book->setDescription,
                'setName'           => $book->setName,
                'setSpec'           => $book->setSpec,
                'thumbnailUrn'      => $book->thumbnailUrn,
                ];
        }

        try {
            BookModel::insert($dataSet);
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }
}
