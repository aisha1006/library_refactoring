<template>
	<div class="text-choosable">
		<div class="justify-content-between align-items-center">
			<div class="font-weight-500">{{$t('more_info')}}</div>
			<div @click="$emit('close')">
				<span class="cursor-pointer font-size-125"><X /></span>
			</div>
		</div>
		<div class="row align-items-start flex-wrap mt-10">
			<div class="pd-20 border-radius bg-light-gray">
				<div class="image" :style="'background-image: url('+backgroundImage+')'"/>
				<div class="mt-10 text-center">{{user.user.student ? user.user.student : user.user.employee}}</div>

			</div>
			<div class="bg-light-gray border-radius pd-16 ml-10 flex-1" v-if='user.user'>
				<div v-for="(value,key,index) in objectWithoutKey(objectWithoutKey(objectWithoutKey(user.user,'user_cid'),'student'),'employee') ">
					<div class="color-gray">{{capitalize($t(key))}} :</div>
					<div>{{value}}</div>
					&nbsp;
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
// mixins
import {goTo} from '../../../mixins/goTo'
//components
import Table from '../../../components/common/Table'
// icons
import X from '../../../assets/icons/X'

export default {
	props:{
		id:String,
		type:String
	},
	mixins:[goTo],
	components:{'table-div':Table,X},
	computed:{
		backgroundImage(){
			return 'data:image/jpeg;base64,'+this.user.photo;
		}
	},
	data(){
		return{
			user:{
				user:{},
				media:[]
			},
			heads:[
				{name:'author',link:'authors'},
				{name:'barcode',link:'barcode'},
				{name:'delivery_date',link:'delivery_date'},
				{name:'due_date',link:'due_date'},
				{name:'inventory_number',link:'inv_id'},
				{name:'issue_date',link:'issue_date'},
				{name:'status',link:'status'},
				{name:'titles',link:'title',countable:true},
				{name:'year',link:'year'},
				],
		}
	},
	methods:{
		capitalize(string){
			return capitalize(string);
		},
		objectWithoutKey(string,key){
			return objectWithoutKey(string,key);
		},
		getInfo(){
			this.$http.get('/user/show/'+this.type+'/'+this.id).then(response=>{
				this.user=response.data.res;
			}).catch(e=>{
				this.goTo('users');
			})
		}
	},
	created(){
		this.getInfo();
	}
}
</script>
<style scoped>
.placeholder{
	background-color: white;
}
input:disabled{
	color:black;
}
.image{
	width:15.625em;
	height: calc(15.625em * 4/3);
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
</style>