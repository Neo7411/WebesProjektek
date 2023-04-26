//  0=rock
// 1=paper
// 2=scissors



function input(a){
    var playerChoice;

    if(a=="rock-button"){
        document.getElementById("player-picture").src = "Rock.png";
        playerChoice = 0;
    }
    else if(a=="paper-button"){
        document.getElementById("player-picture").src = "Paper.png";
        playerChoice = 1;
    }
    else if(a=="scissors-button"){
        document.getElementById("player-picture").src = "Scissors.png";
        playerChoice = 2;
    }
    var computerChoice = getRandomArbitrary(0,3);
    var computerReact;
    if(computerChoice<1){
        document.getElementById("computer-picture").src = "Rock.png";
        computerReact = 0;
    }
    else if(computerChoice<2){
        document.getElementById("computer-picture").src = "Paper.png";
        computerReact = 1;
    }
    else if(computerChoice<3){
        document.getElementById("computer-picture").src = "Scissors.png";
        computerReact = 2;
    }
    var n;
    if(playerChoice==computerReact){
        document.getElementById("outtext").innerHTML = "Tie";
        n=0;
    }
    else if(playerChoice==0 && computerReact==2){
        document.getElementById("outtext").innerHTML = "You Win";
        n=1;
    }
    else if(playerChoice==1 && computerReact==0){
        document.getElementById("outtext").innerHTML = "You Win";
        n=1;
    }
    else if(playerChoice==2 && computerReact==1){
        document.getElementById("outtext").innerHTML = "You Win";
        n=1;
    }
    else{
        document.getElementById("outtext").innerHTML = "You Lose";
        n=2;
    }
    if(n==1){
        var score = document.getElementById("player-score").innerHTML;
        score++;
        document.getElementById("player-score").innerHTML = score;
    }
    else if(n==2){
        var score = document.getElementById("computer-score").innerHTML;
        score++;
        document.getElementById("computer-score").innerHTML = score;
    }
}

function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}







