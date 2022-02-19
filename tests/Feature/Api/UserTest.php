<?php

namespace Tests\Feature\Api;

use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use Lilashih\Simphp\Test\ApiTest;

class UserTest extends ApiTest
{
    public function repo()
    {
        return new UserRepository();
    }

    public function collectionKey(): string
    {
        return UserResource::$key['collection'];
    }

    public function resourceKey(): string
    {
        return UserResource::$key['resource'];
    }

    public function urlKey(): string
    {
        return 'api/users';
    }

    public function getStoreData()
    {
        return $this->getUpdateData();
    }

    public function getUpdateData()
    {
        return [
            'name' => random_str(200),
        ];
    }

    /**
     * Test list API
     *
     * @group User
     */
    public function testIndex(): array
    {
        return parent::indexTest();
    }

    /**
     * Test detail API
     *
     * @depends testIndex
     *
     * @group User
     */
    public function testShow(array $items)
    {
        parent::showTest($items);
    }

    /**
     * Test create API
     *
     * @group User
     */
    public function testStore(): array
    {
        return parent::storeTest();
    }

    /**
     * Test list API for searching 
     *
     * @depends testStore
     *
     * @group User
     */
    public function testIndexByQuery(array $search)
    {
        $items = parent::callIndexByQuery([
            'name' => $search['name'],
        ]);

        $this->assertIsArray($items);
        foreach ($items as $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertArrayHasKey('name', $item);
        }
    }

    /**
     * Test API for avoiding adding dulicate data
     *
     * @group User
     */
    public function testStoreError()
    {
        parent::storeDuplicateTest('name');
    }

    /**
     * Test update API
     *
     * @group User
     */
    public function testUpdate()
    {
        parent::updateTest();
    }

    /**
     * Test delete API
     *
     * @group User
     */
    public function testDestroy()
    {
        parent::destroyTest();
    }

    /**
     * Test list API for searching soft deleted data
     *
     * @group User
     */
    public function testIndexByMode()
    {
        parent::indexByModeTest();
    }
}
