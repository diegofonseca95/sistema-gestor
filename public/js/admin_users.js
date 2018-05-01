$(document).ready(function(){
    M.AutoInit();
});

var app = new Vue({
    el : "#admin-users-box",
    data : {
        users : [],
        edit : {}
    },
    beforeCreate : function(){
        // TEST LIST : http://myjson.com/wehtj
        $.ajax({
            url : 'https://api.myjson.com/bins/wehtj',
            method : 'GET'
        }).done(function(response){
            console.log(response);
            app.users = response.users;
        });
    },
    methods : {
        editUser : function(user){
            WarningToast(user.name);
            this.edit = user;
        }
    }
});