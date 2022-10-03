<script type="text/javascript">
    console.log('Hello World');

    function popupLogin(response_code) {
        if(response_code == 200){
            alert("Successful login, code " + response_code); // this is the message in ""
        }
        else if(response_code == 401){
            alert("Error in login, code " + response_code); // this is the message in ""
        }
        else if(response_code == 666){
            alert("Hai deciso di effettuare il logout");
        }
    }

    popupLogin(<?= $_SESSION['response_code']; ?>);
</script>