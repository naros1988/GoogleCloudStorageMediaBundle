<?php

namespace AppVerk\GoogleCloudStorageMediaBundle\Service;

use Google\Cloud\Storage\Bucket;
use Google\Cloud\Storage\StorageClient;

class Storage
{
    /** @var string */
    private $bucketId;

    /** @var StorageClient */
    private $client;

    /**
     * Storage constructor.
     *
     * @param string $projectId
     * @param string $bucketId
     * @param string $keyFilePath
     */
    public function __construct(string $projectId, string $bucketId, string $keyFilePath)
    {
        $this->bucketId = $bucketId;
        $this->client = new StorageClient(
            [
                'projectId'   => $projectId,
                'keyFilePath' => $keyFilePath,
            ]
        );
    }

    /**
     * @return Bucket
     */
    public function bucket(): Bucket
    {
        return $this->client->bucket($this->bucketId);
    }
}
