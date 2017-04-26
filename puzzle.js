var time=0;
var id_empty;
var num_moves_so_far;
var isCompleted = false;
var numbs = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
function startTimer()
{
	timeValue = setInterval(function(){updateTime()},1000);
} 

function updateTime()
{ 
    time++;
    document.getElementById("time").innerHTML = "Time spent in current game: " +time +" (seconds)";   // calculates the time in seconds
	
} 

function simpleGame()
{
	clearInterval(timeValue);
	startTimer();
    if(isCompleted)
    {
        window.location.reload();
    }
    time = 0;                       
    num_moves_so_far = 0;                          /*calculates the time and number of moves */
    document.getElementById("moves").innerHTML = "Moves so far: " + num_moves_so_far;            // calculate the number of moves
    for(var i = 0; i < 16; i++)                                                     
	{ 
        var temp = document.getElementById(i);
        if(i == 14)                                       
		{
            temp.className = "empty";                                //making the cell empty 
            temp.innerHTML = " ";
            id_empty = i;
        }
        else if(i == 15) 
		{
            temp.className = "cell";
            temp.innerHTML = "15";                              // assigning the index value to 15
        }
        else
		{
            temp.innerHTML = i+1;
            temp.className = "cell";
        }
    }
}
function startPuzzle()
{
	            num_moves_so_far=0; //counts the number of  moves
	 isCompleted = false;
	 startTimer();          // timer starts when selected new game
	 for(var i=0; i<16; i++)
	 {
		 var temp= document.getElementById(i);
		 temp.className = "cell";                     //assigning temp variable to cell 
         		 
	 } 	 
	 randomNumb = numbs.sort(function ()                          //random number generates
	 { 
	    return (Math.round(Math.random())-0.5);
		});
    while(!Prob.prototype.is_solvable(randomNumb)) 
    {
        randomNumb = numbs.sort(function () 
		{
			return (Math.round(Math.random())-0.5);
		});
    }
	
    for(var i=0; i<16; i++)
     {
        var temp = document.getElementById(i);             
        if(randomNumb[i] == 16)                   //choosing the random variable and shuffle the variables 
        {
            temp.className = "cell empty";                    
            temp.innerHTML = "";             //allocate a cell with empty
            id_empty = i;                       // assisgning the value of empty cell
        }
        else
            temp.innerHTML = randomNumb[i];
    }

 
}
Array.prototype.clone = function() { return this.slice(0); };
Array.prototype.swap = function(i1,i2) 
{
    var copy = this.clone();
    var temp = copy[i1];
    copy[i1] = copy[i2];
    copy[i2] = tmp;
    return copy;
};
var Prob = function(start_state) 
{
    this.init_state = start_state;
    return this;
}
Prob.prototype.is_solvable = function(start) {
    start = start.clone();    
	start.splice(start.indexOf(16), 1);
    start[15] = 16;
    var count = 0;
    for(var i=0; i < 15; i++) {
        if(start[i] != i+1) {
            count++;
            var j = start.indexOf(i+1);
            start[j] = start[i];
            start[i] = i+1;
        }
    }
    return count % 2 == 0;
}
function clickcell(x)                 //swapping cell function
{
    if(isCompleted)                   
        return;

    if(x.id != id_empty+'')                          
	{
        var emptyX = Math.floor(id_empty/4);               //assigning variable X
        var emptyY = id_empty % 4;                         // assigning variable Y
        var id_selected = Number(x.id);
        var selectedX = Math.floor(id_selected/4);           
        var selectedY = id_selected % 4;

        if((Math.abs(emptyX-selectedX)==1&&emptyY==selectedY)||(Math.abs(emptyY-selectedY)== 1&&emptyX==selectedX)) //comparision of variables
		{
			document.getElementById(id_empty).className = "cell";
               document.getElementById(id_empty).innerHTML = x.innerHTML;
               x.className = "cell empty";
               x.innerHTML = '';
                  id_empty = id_selected;
                  num_moves_so_far++;
			      document.getElementById("moves").innerHTML = "Moves so far: " + num_moves_so_far;
            
              if(isDone())                 //checking if the puzzle is completed
			  {
				  clearInterval(timeValue);
                  isCompleted = true;
                  document.getElementById("moves").innerHTML = "CONGRATS! Number of moves took to complete the Game:  "+ num_moves_so_far+". Do you want to Start New Game?";
				
              }
        }
    }
}
function isDone()       // checks whether the game is completed
{
                    return document.getElementById('0').innerHTML == '1' &&
                    document.getElementById('1').innerHTML == '2' && document.getElementById('2').innerHTML == '3' &&
                    document.getElementById('3').innerHTML == '4' && document.getElementById('4').innerHTML == '5' &&
                    document.getElementById('5').innerHTML == '6' && document.getElementById('6').innerHTML == '7' &&
                    document.getElementById('7').innerHTML == '8' && document.getElementById('8').innerHTML == '9' &&
                    document.getElementById('9').innerHTML == '10' && document.getElementById('10').innerHTML == '11' &&
                    document.getElementById('11').innerHTML == '12' && document.getElementById('12').innerHTML == '13' &&
                    document.getElementById('13').innerHTML == '14' && document.getElementById('14').innerHTML == '15';
}
