import './bootstrap';
//create an echo -object with method-channel (channel name) as aug.
//suscbribe using suscribe method to relay message to display when suscribed(callback)...this creates a http handshake
//listen on the channel(aug1) and  acall back(action to be triggered when event is triggered ...e.g append array of messages to be displayed)
//fetch data from ui
//send data to end point
//the endpoint route then trigger an event which is eventually listen to by laravel echo----uses laravel in route file
//after the append data is save an array variable, display the array content in the list tag on the ui.