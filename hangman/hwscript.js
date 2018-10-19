
        var word, tries, completed, victory, right, wrong;
        var knowledge = [];
        function check_letter(guess){
            if (victory)
                return 0;
//console.log(word);
            var target = word.split("");
            var found = false;
            var elementChange;
//console.log(target);
            for(var i = 0; i < target.length; ++i){
                if(target[i]==guess){
                    if (target[i] != knowledge[i].innerHTML) ++completed;
                    found = true;
                    knowledge[i].innerHTML = guess;
                }
            }
            if (found) ++right; else {--tries;++wrong;}
            if (tries == 0){
                --victory;
                document.getElementById("status").innerHTML = "YOU LOST";
                }
            if (completed >= word.length) {
                ++victory;
                document.getElementById("status").innerHTML = "WINNER";
            }
//console.log(tries);
            document.getElementById("tries").innerHTML = tries;
            document.getElementById("right").innerHTML = right;
            document.getElementById("wrong").innerHTML = wrong;
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
            victory = completed = 0;
            knowledge = [];
            var options = ["quick", "brown", "fox", "with", "electricity", "tattoo", "jumped",
                            "over", "the", "lazy", "dog"];
            var choice = Math.floor(Math.random()*8);
            word = options[choice];
            tries = 7;
            document.getElementById("tries").innerHTML = tries;
            //var letterId = document.getElementById("letters");
            //letterId.innerHtml = "";
            var unknown = document.getElementById("known");
            while (unknown.firstChild) {
                unknown.removeChild(unknown.firstChild);
            }
            var i;
            for(i = 0; i < word.length; ++i){
                var huh = document.createElement("div");
                huh.id = "tr_" + i;
                huh.innerHTML = "---";
                huh.className = "trial";
                unknown.appendChild(huh);
                knowledge.push(huh);
            }
            for(i = 0; i < 26; ++i){
                //var ltr_btn = document.createElement("button");
                var ltr = (i+10).toString(36);
                var ltr_btn = document.getElementById(ltr);
                ltr_btn.class = "guess";
                //ltr_btn.onclick = "check_letter(" + ltr + ")";
                ltr_btn.innerHtml = ltr;
                //console.log(ltr);
                //letterId.append(ltr_btn);
                //letterId.append("/n");
            }
        }
        loadHangman();
        right = wrong = 0;
        document.getElementById("right").innerHTML = right;
        document.getElementById("wrong").innerHTML = wrong;