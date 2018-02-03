<?php
class User
    {
        private $userData;
        public function init($increment = 0)
            {
                # Get the current level
                $level  =   $_SESSION['level'];
                # If there is an increment
                if($increment > 0) {
                    # Increment the level
                    $level += 1;
                    # !!!***Re-assign the session***!!!
                    $_SESSION['level']  =   $level;
                }
                # Save the internal array
                $userarray['username'] = $_SESSION['username'];
                $userarray['user_id'] = $_SESSION['user_id'];
                $userarray['email'] = $_SESSION['email'];
                # Level will be set by variable now
                $userarray['level'] = $level;
                # Save to array
                $this->userData =  (object) $userarray;
                # Return object for chaining
                return $this;
            }
        # This will call data from your internal array dynamically
        public function __call($name,$args=false)
            {
                # Strip off the "get" from the method
                $name       =   preg_replace('/^get/','',$name);
                # Split method name by upper case
                $getMethod  =   preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY);
                # Create a variable from that split
                $getKey     =   strtolower(implode('_',$getMethod));
                # Checks if there is a key with this split name
                if(isset($this->userData->{$getKey}))
                    $getDataSet =   $this->userData->{$getKey};
                # Checks if there is a key with the raw name (no get though)
                elseif(isset($this->userData->{$name}))
                    $getDataSet =   $this->userData->{$name};
                # Returns value or bool/false
                return (isset($getDataSet))? $getDataSet : false;
            }
    }