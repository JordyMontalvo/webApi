<?php
    require_once 'models/api.php';

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':

            if(isset($_GET['Id_Empresa'])){
                echo json_encode(api::getWhere($_GET['Id_Empresa']));
            }else {
                    echo json_encode(api::getAll());
                }
            break;

            case 'POST':
                $datos = json_decode(file_get_contents('php://input'));
                if($datos != NULL){
                    if(api::insert($datos->nombre,$datos->descripcion,$datos->direccion,$datos->ruc,$datos->fUENTE)){
                           echo json_encode(['status' => 200, 'message' => 'Empresa agregada correctamente']);
                                http_response_code(200);
                        } 
                            else {
                                http_response_code(400);
                            }
            }
              
                break;


                case 'PUT':
                    $datos = json_decode(file_get_contents('php://input'));
                    if($datos != NULL){
                        if(api::update($datos->id, $datos->nombre,$datos->descripcion,$datos->direccion,$datos->ruc,$datos->fUENTE)){
                               echo json_encode(['status' => 200, 'message' => 'Empresa agregada correctamente']);
                                    http_response_code(200);
                            } 
                                else {
                                    http_response_code(400);
                                }
                }

                case 'DELETE':
                    $datos = json_decode(file_get_contents('php://input'));
                    if($datos != NULL){
                        if(api::delete($datos->id)){
                               echo json_encode(['status' => 200, 'message' => 'Empresa eliminada correctamente']);
                                    http_response_code(200);
                            } 
                                else {
                                    http_response_code(400);
                                }
                }
            
                default:
                http_response_code(405);    
                 break;

    }