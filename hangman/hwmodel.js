
        class score{
            constructor(){
                this.victory = 0;
                this.completed = 0;
                this.right = 0;
                this.wrong = 0;
                this.lives = 0;
            };
            success(finish){
                this.right++;
                this.completed++;
                if(this.completed >= finish) {
                    this.victory++;
                    document.getElementById("status").innerHTML = "WINNER";
                }
                document.getElementById("right").innerHTML = this.right;
            }
            fail(){
                this.wrong++;
                this.lives--;
                if(this.lives<=0) {
                    this.victory--;
                    document.getElementById("status").innerHTML = "YOU LOST";
                }
                document.getElementById("tries").innerHTML = this.lives;
                document.getElementById("wrong").innerHTML = this.wrong;
            }
            reset(){
                this.lives = 7;
                this.completed = 0;
                this.victory = 0;
                document.getElementById("tries").innerHTML = this.lives;
                document.getElementById("right").innerHTML = this.right;
                document.getElementById("wrong").innerHTML = this.wrong;
            }
            active(){
                if(this.victory!=0){
                    return false;
                }
                return true;
            }
        }

        class court{
            constructor(){
                this.knowledge = [];
                this.word = [];

                var options = ["quick", "brown", "fox", "with", "electricity", "tattoo", "jumped",
                                "over", "the", "lazy", "dog"];
                var choice = Math.floor(Math.random()*8);
                this.word = options[choice].split("");

                var unknown = document.getElementById("known");
                while (unknown.firstChild) {
                    unknown.removeChild(unknown.firstChild);
                }
                var i;
                for(i = 0; i < this.word.length; ++i){
                    var huh = document.createElement("div");
                    huh.id = "tr_" + i;
                    huh.innerHTML = "---";
                    huh.className = "trial";
                    unknown.appendChild(huh);
                    this.knowledge.push(huh);
                }
            }
            guess(g, sc){
//this.echo();
                var found = false;
//console.log(target);
                for(var i = 0; i < this.word.length; ++i){
                    if(this.word[i]==g){
                        if (this.word[i] != this.knowledge[i].innerHTML) sc.success(this.word.length);
                        found = true;
                        this.knowledge[i].innerHTML = g;
                    }
                }
                    if (found);
                    else sc.fail();
            }
            echo(){
                console.log(this.word);
            }
            
        }
    