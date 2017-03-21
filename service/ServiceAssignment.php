<?php

namespace CodeRefactory\service;

class ServiceAssignment 
{

    public $state = false;
    public $code = '3';

    function __construct() {
        
    }

    public function serviceAssignment($idService, $idDriver) 
    {
        $servicio = Service::find($idService);

        if ($servicio != NULL) {
            if ($servicio->status_id == '6') {
                $this->$code = '2';
            } elseif ($servicio->driver_id == NULL && $servicio->status_id == '1') {

                $servicio = $this->updateServiceAndDriver($idService, $idDriver);
                $this->updateServiceCar($idService, $idDriver);
                $this->$state = true;
            } else {
                $this->$code = '1';
            }
        }

        return $servicio;
    }

    public function updateServiceAndDriver($idService, $idDriver) 
    {
        $service = Service::update($idService, array(
                    'driver_id' => $idDriver,
                    'status' => '2'
                        )
        );

        Driver::update($idDriver, array(
            "available" => '0'
        ));


        return Service::find($idService);
    }

    public function updateServiceCar($idService, $idDriver) {
        $driver = Driver::find($idDriver);
        Service::update($idService, array(
            'car_id' => $driver->car_id
        ));
    }

}
