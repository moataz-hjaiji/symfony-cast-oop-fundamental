<?php

namespace Service;

class LoggableShipStorage implements ShipStorageInterface
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return array
     */
    public function fetchAllShipsData(): array
    {
        return $this->shipStorage->fetchAllShipsData();
    }

    /**
     * @param $id
     * @return array
     */
    public function fetchSingleShipData($id): array
    {
        return $this->shipStorage->fetchSingleShipData($id);
    }
}