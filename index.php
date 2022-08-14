<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <title>Detect Battery Status</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&display=swap"
      rel="stylesheet"
    />
    
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="style.css" />
    
    
  </head>
  <body>
      
  <script>
  
//  batteryLevel2=40;
 
      
      </script>



<div id="battery_icon"> </div>

  
  <img class="hide" id="mylogo" width="300px"  src="djbhai_logo.svg">
	
    <img  class="hide" id="mylogo" width="300px"  src="http://localhost:8000/progress/battery/battery.svg">
	
  
  
  
  
  
  
  
  
  <style> 
  
  
@media (min-width: 360px) {
  body{ background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSlNnVwi5GVD4okDyK1UWdaXdIFlKvaW-kzQ&usqp=CAU) #212121; 
  
  background-size: auto;
  background-repeat: repeat;
  
  }
 
  }
  
  

@media (min-width: 760px) {
  body{ background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSlNnVwi5GVD4okDyK1UWdaXdIFlKvaW-kzQ&usqp=CAU) #212121; 
  
  
  background-repeat: repeat;
  background-size: 100%; }
  
 
  }
  



  .hide{ display: none; }
  #demo{ z-index: 100; color: black;
  
  text-shadow: 0px 20px 2px rgba(255, 255, 255, 0.4);
  
  }
        #demo{ position: absolute; left: 90px; top: 80px;
        font-size: 20px; 
        
  background-size: auto; }
  
  #mylogor{ position: absolute; left: 60px; top: 80px;
        font-size: 20px; }
  
  
  
        
        
    #cont{background: transparent; 
  display: block;
  height: 200px;
  width: 200px;
  margin: auto auto;
  border-radius: 100%;
  position: relative;
  left: 0px; 
  top: 30%;
  
}

#cont:after{
  position: absolute;
  display: block;
  height: 160px;
  width: 160px;
  left: 50%;
  top: 50%;
  content: attr(data-pct)" ";
  margin-top: -80px;
  margin-left: -80px;
  border-radius: 100%;
  line-height: 160px;
  font-size: 2em;
  color: #000;
}

                 
        #bar{ 
        fill: transparent;
        stroke: white;
        stroke-width: 10;
        stroke-dasharray: 565;
        stroke-dashoffset: 0;
        }
        
        
        #bar2{    fill: white;
        stroke-width: 10;
        stroke: #ddd;
        stroke-dasharray: 565;
        stroke-dashoffset: 0; }
        
        #clock_second , #svg_clock_minutes, #svg_clock_hour{fill: none;
        stroke-width: 1;
        
        stroke: url(#GradientColor);
        
        stroke-dasharray: 125;
        stroke-dashoffset: 125; }
        
        
        #clock_second_fill{ fill: none;
        stroke-width: 1;
        stroke: #ddd !important;
        
        stroke-dasharray: 125;
       
        stroke-dashoffset: 0;
         }
        
        
        
       .djbhai_anim{animation: djbhai 1s linear 0s infinite;  }
      
      #clock_second, #svg_clock_minutes, #svg_clock_hour {animation: djbhai2 5s linear 0s infinite; }

                @keyframes djbhai{
                
      100% {  stroke-dashoffset: 0;    }
}



@keyframes djbhai2{

      100% {  stroke-dashoffset: 0;    }
}





        </style>
  
    
    
    <script src="https://raw.githubusercontent.com/dhananjoynath/mrdjbhai.github.io/index/script.js"></script>
    
    
          
<script>
var demo=document.getElementById("demo");
var bar=document.getElementById("bar");
var svg_battery_percentage=document.getElementById("svg_battery_percentage");

//const chargeLevel = document.getElementById("charge-level");
//const charge = document.getElementById("charge");
//const chargingTimeRef = document.getElementById("charging-time");




const my_p = document.getElementById("my_p");
const is_charging = document.getElementById("is_charging");

 const battery_icon = document.getElementById("battery_icon");




window.onload = () => {

  if (!navigator.getBattery) {
    alert("Battery Status Api Is Not Supported In Your Browser");
    return false;
  }
};

navigator.getBattery().then((battery) => {
  function updateAllBatteryInfo() {
    updateChargingInfo();
    updateLevelInfo();
  }
  updateAllBatteryInfo();

   battery.addEventListener("chargingchange", () => {
    updateAllBatteryInfo();
  });


  battery.addEventListener("levelchange", () => {
    updateAllBatteryInfo();
  });

  function updateChargingInfo() {
    if (battery.charging) {
      
     // is_charging.textContent='charging';

      
      bar.classList.add("djbhai_anim");
      
      
      
    } else {
    
    bar.classList.remove("djbhai_anim");
    

   
      if (parseInt(battery.dischargingTime)) {
        let hr = parseInt(battery.dischargingTime / 3600);
        let min = parseInt(battery.dischargingTime / 60 - hr * 60);
    
      }
    }
  }


  function updateLevelInfo() {
    let batteryLevel = `${parseInt(battery.level * 100)}%`;
    
    let batteryLevel2 = `${parseInt(battery.level * 100)}`;
    
    
     demo.innerText=batteryLevel;
     
    
    
       if(   batteryLevel2 >=1  && batteryLevel2 <=25 ) {  
       battery_icon.innerHTML=`<i class="fa fa-battery-empty" aria-hidden="true"></i>`;  }
       
      else   if(   batteryLevel2 >=26  && batteryLevel2 <=50 ) {  
      battery_icon.innerHTML=`<i class="fa fa-battery-half" aria-hidden="true"></i> `;   }
      
      else   if(    batteryLevel2 >=51  && batteryLevel2 <=75 ) {  
      battery_icon.innerHTML=` <i class="fa fa-battery-three-quarters" aria-hidden="true"></i>`; }
      
         else   if(     batteryLevel2 >=76  && batteryLevel2 <=100 ) {  
         battery_icon.innerHTML=`<i class="fa fa-battery-full" aria-hidden="true"></i>`;
          }
         
    
       
      let pi_value= Math.PI*(90*2);
      strokeDashoffset_strlen=((100-batteryLevel2)/100)*pi_value;
     
//demo1.innerHTML=`${Math.floor(ll)}`; 

bar.style.strokeDashoffset=`${strokeDashoffset_strlen}`; 
bar.style.stroke=`url(#GradientColor)`; 
    
    
    
    
  }
});
</script>


  </body>
</html>
