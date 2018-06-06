<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//$app = new \Slim\App;

//GET all customers
$app->get('/api/customers', function(Request $req, Response $res){
    $sql = "SELECT * FROM customers";

    try{
        $db = new Db();
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $json = json_encode($customers);
        $res->getBody()->write($json);


    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
    return $res;
});

$app->get('/api/customer/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');

    $sql = "SELECT * FROM customers WHERE id = $id";

    try{
        $db = new Db();
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $json = json_encode($customer);
        $res->getBody()->write($json);


    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
    return $res;
});

$app->post('/api/customer/add', function(Request $req, Response $res){
    $first_name = $req->getParam('first_name');
    $last_name = $req->getParam('last_name');
    $phone = $req->getParam('phone');
    $email = $req->getParam('email');
    $address = $req->getParam('address');
    $city = $req->getParam('city');
    $state = $req->getParam('state');

    $sql = "INSERT INTO customers (first_name,last_name,phone,email,city,state,address)
                   VALUES(:first_name,:last_name,:phone,:email,:city,:state,:address)";

    try{
        $db = new Db();
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name',$first_name);
        $stmt->bindParam(':last_name',$last_name);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':city',$city);
        $stmt->bindParam(':state',$state);

        $stmt->execute();

        echo 'Customer Added! <a href="http://restful.api/">Back</a>';


    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
    return $res;
});

$app->delete('/api/customer/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "DELETE FROM customers WHERE customers.id = " . $id;

    try {
        $db = new Db();
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();

        echo '{msg:{"text":"customer deleted!"}}';

    } catch (Exception $e) {
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
});

$app->put('/api/customer/{id}', function(Request $req, Response $res){
    $first_name = $req->getParam('first_name');
    $last_name = $req->getParam('last_name');
    $phone = $req->getParam('phone');
    $email = $req->getParam('email');
    $address = $req->getParam('address');
    $city = $req->getParam('city');
    $state = $req->getParam('state');

    $id = $req->getAttribute('id');

    $sql = "UPDATE customers SET first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, address = :address, city = :city, state = :state WHERE customers.id = ".$id;

    
    try{
        $db = new Db();
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name',$first_name);
        $stmt->bindParam(':last_name',$last_name);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':city',$city);
        $stmt->bindParam(':state',$state);

        $stmt->execute();

        echo '{msg:{"text":"customer updated!"}}';
    }catch(Exception $e){
        echo '{"error": {"text": '.$e->getMessage().'}}';
        
    }
});
