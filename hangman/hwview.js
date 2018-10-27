class GuessButton{
    constructor(ch, ref, ctrl){
        this.character = ch; //character that this would check for
        this.elRef = ref; //element reference
        this.control = ctrl; //the controller object

        this.unused = true; //whether this button was pressed or not

        this.elRef.className = "guess";
        this.elRef.onclick = this.clic();
    }
    clic(){
        if(unused){
            this.unused = false;
            this.elRef.className += " disabled";
            this.control.chLetter(this.character);
        }
    }
}
class EvidenceDiv{
    constructor(){
    }
}