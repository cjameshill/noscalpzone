export default class Flash {

    constructor(value, type){
        this.type = type;
        this.value = value;
    }

    message(value = 'Hi', type = '') {
        vm.notifications.push({type: type, body: value});
        if(type != 'is-danger'){
            this.fadeOut();
        }
    }

    fadeOut(){
        setTimeout(function () {
            vm.notifications.splice(vm.notifications.$index, 1);
        }, Sandbox.notificationDelay);
    }
}