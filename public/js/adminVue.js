new Vue({
		el: '#app',
		data:{
			allposts: ''
			},
		ready: function(){
			this.fetchMessages();		    
			
		},
		methods: {
			fetchMessages: function(){
				this.$http.get('allmessages').then(function(allposts){
		    		this.$set('allposts', allposts.data);
		    		console.log(allposts);
		    	});	
			}
		}
});