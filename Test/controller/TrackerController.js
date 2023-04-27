
    const sequelize = require('../models/sequelize');
    const Tracker = require('../models/Tracker');

        
async function getTracker(){
        return new Promise((resolve,reject) =>{
            Tracker.findAll().then((res)=>{
               resolve(res);
            }).catch((err)=>{
                reject(err);
            })
        })
       
      
    }
     
 

        
     
     async function getByid(id_value){
      Tracker.findAll({
            where: {
              id: id_value
            }
          }).then((res)=>{
            resolve(res);
          }).catch((err)=>{
             reject(err);
          })

         
    }
    
    
     
     async function getBycommand(command_value){
      Tracker.findAll({
            where: {
              command: command_value
            }
          }).then((res)=>{
            resolve(res);
          }).catch((err)=>{
             reject(err);
          })

         
    }
    
    
     
     async function getBytimeStamp(timeStamp_value){
      Tracker.findAll({
            where: {
              timeStamp: timeStamp_value
            }
          }).then((res)=>{
            resolve(res);
          }).catch((err)=>{
             reject(err);
          })

         
    }
    
     
 
 
        
        function setTracker(Tracker_object){
            Tracker.create(Tracker_object).then((res)=>{
                return true;
            }).catch((err)=>{
                return false;
            });
        }
     
 

        
        public function updateByid(id_data,object){
       await Tracker.update(object, {
            where: {
              id: id_data
            }
          });
        }
    
        public function updateBycommand(command_data,object){
       await Tracker.update(object, {
            where: {
              command: command_data
            }
          });
        }
    
        public function updateBytimeStamp(timeStamp_data,object){
       await Tracker.update(object, {
            where: {
              timeStamp: timeStamp_data
            }
          });
        }
    

    