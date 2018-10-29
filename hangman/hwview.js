class GuessButton{
    constructor(ch, ref, ctrl){
        this.character = ch; //character that this would check for
        this.elRef = ref; //element reference
        this.control = ctrl; //the controller object

        this.unused = true; //whether this button was pressed or not

        this.elRef.className = "guess";
        this.elRef.onclick = this.clic();
        this.elRef.innerHTML = this.character;
    }
    //Sets disabled to true essentially, and sends a message to control
    clic(){
        if(unused){
            this.unused = false;
            this.elRef.className += " disabled";
            if(this.control.chLetter(this.character))
                this.elRef.className += " correct";
            else this.elRef.className += " wrong";
        }
    }
    //Sets disabled to false
    refresh(){
        this.unused = true;
        this.elRef.className = "guess";
    }
}
class EvidenceDiv{
    constructor(ctrl, sz){
        this.elRef = document.getElementById("known");
        this.control = ctrl;
        this.wordSize = sz;
        this.blanks = [];
        while(this.elRef.firstChild){
            this.elRef.removeChild(this.elRef.firstChild);
        }
        let i = 0;
        while(i < sz){
            let huh = document.createElement("div");
            this.elRef.appendChild(huh);
            this.blanks.push(new EvidenceBlank(huh));
            ++i;
        }
    }
    setTrue(idx, ch){
        if(idx > this.blanks.length)
            return false;
        this.blanks[idx].setTrue(ch);
        return true;
    }
}
class EvidenceBlank{
    constructor(ref){
        this.elRef = ref;
        this.character = ch;
        this.elRef.innerHTML = "?";
        this.elRef.class = "unsolved";
    }
    setTrue(ch){
        this.elRef.innerHTML = ch;
        this.elRef.class = "solved";
    }
}
function genCharArray(charA, charZ) {
    var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
    for (; i <= j; ++i) {
        a.push(String.fromCharCode(i));
    }
    return a;
}
class View {
    constructor(ctrl){
        this.control = ctrl;
        this.choices = [];
        this.score = [];
        let a = genCharArray('a', 'z'), i = 0;
        for (; i <= a.length; ++i) {
            let b = document.createElement("button");
            document.getElementById("letters").appendChild(b);
            this.choices.push(new GuessButton(a[i], b, ctrl));
        }
        let res = document.createElement("button");
        let sv = document.createElement("button");
        document.appendChild(res);
        document.appendChild(sv);
        this.reset = res;
        this.save = sv;
    }
    refresh(){
        let i = 0;
        for(; i<=a.length;++i){
            a[i].refresh();
        }
    }
}