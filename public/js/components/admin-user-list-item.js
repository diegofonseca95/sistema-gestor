Vue.component('admin-user-list-item', {
    props : ['editUser', 'user'],
    data : function(){
        return {
            hovered : false
        };
    },
    methods : {
        approveUser : function(event){
            SuccessToast(this.user.name);
        },
        deleteUser : function(event){
            ErrorToast(this.user.name);
        },
        onMouseLeave: function(event){
            this.hovered = false;
        },
        onMouseEnter: function(event){
            this.hovered = true;
        }
    },
    computed : {
        fullName : function(){
            return this.user.name + ' '
                + this.user.flast + ' '
                + this.user.mlast + ' ';
        }
    },
    template : 
        "<li class='collection-item avatar'" +
            " v-on:mouseenter='onMouseEnter'" +
            " v-on:mouseleave='onMouseLeave'>" +
            "<i class='material-icons circle third-background'>person</i>" +
            "<span class='title truncate hide-on-small-only'>" +
                "{{ fullName }}" +
            "</span>" +
            "<span class='title truncate hide-on-med-and-up'>" +
                "{{ user.name }}" +
            "</span>" +
            "<p class='truncate'>" +
                "Correo : {{ user.mail }}" +
                "<br>" +
                "Teléfono : {{ user.phone }}" +
            "</p>" +
            "<div class='secondary-content' v-if='hovered'>" +
                "<a href='#!' v-on:click='deleteUser'>" +
                    "<i class='material-icons error-text'>close</i>" +
                "</a>" +
                "<a href='#!' v-if='!user.valid' v-on:click='approveUser'>" +
                    "<i class='material-icons ok-text'>check</i>" +
                "</a>" +
            "</div>" +
        "</li>"
});