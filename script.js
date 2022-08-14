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