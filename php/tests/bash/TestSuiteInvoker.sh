!#/bin/bash
echo "Enviroment test suite....."

# Test function
phar_tester () {
    echo "Check test engine existance and permissions....."
    if (-f ["*.phar"]){
        if ("ls -alh *.phar | grep xargs" == 777){
            echo "Executing tests...."
            command = "php -r *.phar"
            eval $command
        } else {
            echo "Wrong permissions are set. Unable to continue"
            break
        }
    } else {
        echo "Test file not present. Unable to continue"
        break
    }
}

# phar_tester()