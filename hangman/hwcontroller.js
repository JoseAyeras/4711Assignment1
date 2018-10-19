        //import {court} from "hwmodel.js";
        //import {score} from "hwmodel.js";
        var sc, ct;
        //sc is a score
        //ct is a court
        function check_letter(guess){
//ct.echo();
            if (!sc.active())
                return 0;
//console.log(word);
            ct.guess(guess, sc);
            return 0;
        }
        function loadHangman(){
            /*var xmail = new XMLHttpRequest();
            xmail.open("GET", "hangWordStart.php", true);
            xmail.send();
            //var init = JSON.parse(this.responseText);
            xmail.onreadystatechange = function(){
                if (xmail.readyState == 4 && xmail.status == 200){
                    console.log(this.response);
                }
            }*/
            sc.reset();
            ct = new court();
        }
        sc = new score();
        loadHangman();