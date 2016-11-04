
<?php
class Bootstrap
{
    //用來處理request、URL的解析：controller、action
    //ex：localhost:8888/users/login
    //users => controller
    //login => action

    private $request;
    private $controller;
    private $action;

    public function __construct($request)
    {
        $this->request = $request;

        //handle controller
        if ($this->request['controller'] == "")   //代表http://localhost/ 而已, redirect到home
        {
            $this->controller = 'home';
//            echo $this->controller;
        } else {
            $this->controller = $request['controller'];
//            echo $this->controller;
        }


        //handle action
        if ($this->request["action"] == "") {
            $this->action = "index";
//            echo $this->action;
        } else {
            $this->action = $this->request["action"];
//            echo $this->action;
        }
    }

    //1.check class/controller exists、2.check extend、3.check method/action
    //if pass all checks, then instantiate
    public function createController()
    {
        //1.check class/controller exist     class_exists(string $class_name)
        if (class_exists($this->controller)) {

            //2.check extend
            $parent = class_parents($this->controller);
            if(in_array("Controller", $parent)){    //???對照下面的base controller doesn't found

                //3.check method/action exist
                if(method_exists($this->controller, $this->action)){

                    //pass all checks, then instantiate
                    return new $this->controller($this->action, $this->request); //???
                }else{
                    echo "<h1>method doesn't exist.</h1>";
                }
            }else{
                echo "<h1>base Controller (『C』ontroller.php) doesn't found.</h1>";
            }
        }else{
            echo "<h1>controller class doesn't exist.</h1>";
        }
    }
}