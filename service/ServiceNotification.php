<?php

namespace CodeRefactory\service;

class ServiceNotification {
    
    public $code;
    public $result;
    
    public function notification($service) 
    {
        $pushMessage = 'tu servicio ha sido confirmado';
        $push = Push::make();
        
        if ($service->user->uuid == '') {
            $this->$code = '0';
        } else {
            if ($service->user->type == '1') {
                $this->$result = $push->ios($service->uuid, $pushMessage, 1, 'honk.wav', 'Open', array('serviceId' => $servicio->id));
            } else {
                $this->$resul = $push->android2($service->user->uuid, $pushMessage, 1, 'default', Open, array('serviceId' => $servicio->id));
            }
            $this->$code = '0';
        }
    }

}
