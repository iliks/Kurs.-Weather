<?php
if($_SERVER['REQUEST_METHOD']==='GET'){
    header('Content-Type: application/json');
    $data = file_get_contents('../assets/data.json');
    print($data);
    header('HTTP/1.0 200 OK');
    exit();
}
elseif ($_SERVER['REQUEST_METHOD']==='POST'){
    $inputJSON = file_get_contents('php://input',true);
    $input = json_decode($inputJSON,true);
    if(isset($input['type'])){
        if($input['type']==='parse'){
            $page = file_get_contents($input['url']);
            echo $page;
            exit();
        }
        if ($input['type']==='add'){
            if(isset($input['name']) and isset($input['url']) and !empty($input['name']) and !empty($input['url'])){
                $data = json_decode(file_get_contents('../assets/data.json'));
                array_push($data, array('city'=>$input['name'], 'url'=>$input['url']));
                file_put_contents('../assets/data.json', json_encode($data,JSON_UNESCAPED_UNICODE));
                header('HTTP/1.0 200 OK');
                exit();
            }
            else{
                header('HTTP/1.0 402');
                exit();
            }
        }
        if($input['type']==='newUser'){
            if(isset($input['user']) and isset($input['pass']) and !empty($input['user']) and !empty($input['pass'])){
                print('prov');
                $data = json_decode(file_get_contents('../assets/users.json'));
                $salt = '';
                $salt = bin2hex(time());
                $pass = md5($salt.$input['pass']);
                array_push($data, array('user'=>$input['user'], 'psw'=>$pass, 'salt'=>$salt));
                print_r($data);
                file_put_contents('../assets/users.json', json_encode($data,JSON_UNESCAPED_UNICODE));
                header('HTTP/1.0 200 OK');
                exit();
            }
            else{
                header('HTTP/1.0 400 OK');
            }
        }
    }
}
elseif ($_SERVER['REQUEST_METHOD']==="DELETE"){
    $inputJSON = file_get_contents('php://input',true);
    $input = json_decode($inputJSON,true);
    if (isset($input['id']) and !empty($input['id'])){
        $data = json_decode(file_get_contents('../assets/data.json'));
        foreach ($data as $key=>$value){
            echo ($key);
            if ($key === $input['id']){
                array_splice($data, $key,1);
                file_put_contents('../assets/data.json', json_encode($data,JSON_UNESCAPED_UNICODE));
                header('HTTP/1.0 200 OK');
                break;
                exit();
            }
        }
    }
}