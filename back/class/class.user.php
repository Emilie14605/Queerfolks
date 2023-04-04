<?php
session_start();
require_once('core/db-inc.php');
require_once('core/functions.php');
class User
{
    private $id;
    private $name;
    private $firstname;
    private $surname;
    private $email;
    private $password;
    private $picture;
    private $description;
    private $gender;
    private $sexualorientation;
    private $romanticorientation;
    private $looking;
    private $isadmin;

    // Constructeur
    public function __construct($id='',$args='')
    {
        global $db;
        if(!empty($id))
        {
            $req = $db->prepare('SELECT * FROM `table_user` User_ID = :id');
            $req->bindParam(':id',$id,PDO::PARAM_INT);
            if($req->execute())
            {
                if($req->rowCount() == 1)
                {
                    $obj = $req->fetch(PDO::FETCH_OBJ);
                    $this->id = $obj->User_ID;
                    $this->name = $obj->User_Name;
                    $this->firstname = $obj->User_Firstname;
                    $this->surname = $obj->User_Surname;
                    $this->email = $obj->User_Email;
                    $this->password = $obj->User_Password;
                    $this->picture = $obj->User_Picture;
                    $this->description = $obj->User_Description;
                    $this->gender = $obj->User_Gender;
                    $this->sexualorientation = $obj->User_SexualOrientation;
                    $this->romanticorientation = $obj->User_RomanticOrientation;
                    $this->looking = $obj->User_Looking;
                    $this->isadmin = $obj->User_IsAdmin;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else if(!empty($args))
        {
            $this->name = $args['name'];
            $this->firstname = $args['firstname'];
            $this->surname = $args['surname'];
            $this->email = $args['email'];
            $this->password = self::generatePassword();
            $this->picture = $args['picture'];
            $this->description = $args['description'];
            $this->gender = $args['gender'];
            $this->sexualorientation = $args['sexualorientation'];
            $this->romanticorientation = $args['romanticorientation'];
            $this->looking = $args['looking'];
        }
    }
    // Setter
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
 
    public function setSexualorientation($sexualorientation)
    {
        $this->sexualorientation = $sexualorientation;

        return $this;
    }

    public function setRomanticorientation($romanticorientation)
    {
        $this->romanticorientation = $romanticorientation;

        return $this;
    }
 
    public function setLooking($looking)
    {
        $this->looking = $looking;

        return $this;
    }
 
    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;

        return $this;
    }

    // Getter
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
 
    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
 
    public function getPicture()
    {
        return $this->picture;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getSexualorientation()
    {
        return $this->sexualorientation;
    }

    public function getRomanticorientation()
    {
        return $this->romanticorientation;
    }

    public function getLooking()
    {
        return $this->looking;
    }

    public function getIsadmin()
    {
        return $this->isadmin;
    }
    private function generatePassword()
    {
        $str = 'azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBN';
        // On transforme la chaine de caractères en tableau
        $tab = str_split($str);
        // On génère la longueur du mot de passe entre 12 et 16
        $long = rand(12,16);
        // On fait une boucle sur la longueur du mot de passe
        $mdp = '';
        for($i=0;$i<$long;$i++)
        {
            // On ajoute les caractères au hasard avec array_rand
            $str_rand = array_rand($tab);
            $mdp.= $tab[$str_rand];
        }
        return $mdp;
    }
    public function register()
    {
        global $db;
        $req = $db->prepare('SELECT User_ID FROM `table_user` = :email');
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
        if($req->rowCount() == 0)
        {
            $req2 = $db->prepare('INSERT INTO `table_user` SET
                                   User_Name = :name,
                                   User_Firstname = :firstname,
                                   User_Email = :email,
                                   User_Password = :password 
                                ');
            $req2->bindValue(':name',$this->name,PDO::PARAM_STR);
            $req2->bindValue(':firstname',$this->firstname,PDO::PARAM_STR);
            $req2->bindValue(':email',self::generatePassword($this->password),PDO::PARAM_STR);
            $req2->bindValue(':password',$this->name,PDO::PARAM_STR);
            if($req2->execute())
            {
                $last_id = $db->lastInsertId();
                return $last_id;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function update()
    {
        global $db;
        $req = $db->prepare('SELECT User_ID FROM `table_user` WHERE User_Email = :email AND User_ID != :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
        if($req->rowCount() == 0)
        {
            $req2 = $db->prepare('UPDATE `table_user` SET
                                   User_Name = :name,
                                   User_Firstname = :firstname,
                                   User_Surname = :surname,
                                   User_Email = :email,
                                   User_Password = :password,
                                   User_Picture = :picture,
                                   User_Description = :description,
                                   User_Gender = :gender,
                                   User_SexualOrientation :sexualorientation,
                                   User_RomanticOrientation = :romanticorientation
                                   User_Looking = :looking,
                                   User_IsAdmin = :isadmin
                                ');
            $req2->bindValue(':name',$this->name,PDO::PARAM_STR);
            $req2->bindValue(':firstname',$this->firstname,PDO::PARAM_STR);
            $req2->bindValue(':surname',$this->surname,PDO::PARAM_STR);
            $req2->bindValue(':email',$this->email,PDO::PARAM_STR);
            $req2->bindValue(':password',self::generatePassword($this->password),PDO::PARAM_STR);
            $req2->bindValue(':picture',$this->picture,PDO::PARAM_STR);
            $req2->bindValue(':description',$this->description,PDO::PARAM_STR);
            $req2->bindValue(':gender',$this->gender,PDO::PARAM_STR);
            $req2->bindValue(':sexualorientation',$this->sexualorientation,PDO::PARAM_STR);
            $req2->bindValue(':romanticorientation',$this->romanticorientation,PDO::PARAM_STR);
            $req2->bindValue(':looking',$this->looking,PDO::PARAM_STR);
            $req2->bindValue(':isadmin',$this->isadmin,PDO::PARAM_BOOL);
        }
    }
    public function getConnexion($email='', $password='')
    {
        global $db;
        if($email && $password)
        {
            $req = $db->prepare('SELECT User_Email, User_Password FROM `table_user` WHERE User_Email = :email AND User_Password = :password');
            $req->bindParam(':email',$email,PDO::PARAM_STR);
            $req->bindParam(':password',$password,PDO::PARAM_STR);
        }
        if(!empty($_COOKIE['id']) && (!empty($_COOKIE['password'])))
        {
            $req = $db->prepare('SELECT Client_ID, Client_Password FROM `table_client` WHERE Client_ID = :id AND Client_Password = :password');
            $req->bindParam(':id',$_COOKIE['id'],PDO::PARAM_INT);
            $req->bindParam(':password',$_COOKIE['password'],PDO::PARAM_STR);
        }
        if(isset($req) && $req->execute())
        {
            if($req->rowCount() == 1)
            {
                $obj = $req->fetch(PDO::FETCH_OBJ);
                $_SESSION['connect'] = 1;
                setcookie('id',$obj->User_ID,(time()+86400));
                setcookie('password',$obj->User_Password,(time()+86400));
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
?>