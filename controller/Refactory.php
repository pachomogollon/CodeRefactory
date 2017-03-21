<?php

namespace CodeRefactory\controller;

class Refactory 
{

    function __construct(ServiceAssignment $serviceAssignment, ServiceNotification $serviceNotification) 
    {
        $this->serviceAssignment = $serviceAssignment;
        $this->serviceNotification = $serviceNotification;
    }

    public function postConfirm() 
    {
        $idService = Input::get('service_id');
        $idDriver = Input::get('driver_id');

        $servicio = $this->$serviceAssignment->serviceAssignment($idService, $idDriver);
        $postConfirmAnswer = Response::json(array('error' => $this->$serviceAssignment->$code));

        if ($this->$serviceAssignment->$state) {
            $this->$serviceNotification->notification($servicio);
            $postConfirmAnswer = Response::json(array('error' => $this->$serviceNotication->$code));
        }

        return $postConfirmAnswer;
    }

}
