<template>
	<form class="row" @submit.prevent="loadResults()">
		<div class="mt-10 ml-10 bg-white border-radius fifth"><filter-div /></div>
		<div class="mt-10 ml-10 bg-white border-radius width-80 mr-10 pd-20">
			<div class="align-items-start justify-content-between">
				<div class="align-items-start flex-1">
					<div class="col flex-1">
						<div class="row flex-1" :class="{'mt-10':index!=0}" v-for="(input,index) in inputs">
							<div class="row flex-1">
								<div class="select relative bg-white z-index-1">
									<select class="no_border_right full-height" v-model="input.key">
										<option v-for="(item,index) in items.search_fields" :value="item.key">{{$tc(item.key,1)}}</option>
									</select>
									<label class="placeholder">{{$t('type')}}</label>
								</div>
								<input-div class="flex-1" classes="border-gray no_border_left full-height" :search='true' :onSubmit="loadResults" v-model="input.value" :placeholder="$t('search_by',{type:$t(input.key+'_by')})"/>
							</div>
							<div class="ml-5 row">
								<div class="select double-width mr-10" v-if="inputs.length>1 && index<inputs.length-1">
									<select v-model="inputs[index+1].operator">
										<option value="and">{{$t('and')}}</option>
										<option value="or">{{$t('or')}}</option>
										<option value="not">{{$t('not')}}</option>
									</select>
								</div>
								<button type="button" class="width outline-orange" @click="addInput({key:'author',operator:'and'})" v-if="index==0">+</button>
								<button type="button" class="width outline-orange" @click="removeInput(input)" v-else>-</button>
							</div>
						</div>
					</div>
				</div>
				<div class="align-items-center ml-50">
					<button type="button" @click="$router.push({path:'print'})">
						<span><Print /> &nbsp;</span>
						<span>{{($t('print'))}}</span>
					</button>
					<button type="button" class="ml-10" @click="showModal(CreateItems,{lastCreated:lastCreated})">
						<span><Plus /> &nbsp;</span>
						<span>{{($t('add_item'))}}</span>
					</button>
				</div>
			</div>
			<div class="margin-top">
				<div v-if="items.searching">
					<table-div class="margin-top" :heads="heads" :data="items.data.res" :pagination="pagination" :editObj="editObj" :deleteObj="deleteObj" :showMore="showMore" link="/item" commit="items"/>
				</div>
			</div>
		</div>
	</form>
</template>
<script type="text/javascript">
// mixins
import showModal from '../../../mixins/showModal'
import {getResults} from '../../../mixins/common'

// common components
import Table from '../../../components/common/Table'
import More from '../../../components/common/More'
import Input from '../../../components/common/Input'

// item components
import CreateItems from './CreateItems'
import Filter from './Filter'

// icons
import Print from '../../../assets/icons/Print'
import Plus from '../../../assets/icons/Plus'
import Download from '../../../assets/icons/Download'

export default{
	mixins:[showModal,getResults],
	components:{
		'table-div':Table,
		'filter-div':Filter,
		'input-div':Input,
		Print,
		Download,
		Plus,
	},
	computed:{
		items(){
			return this.$store.getters.items;
		},
		inputs(){
			return this.$store.getters.items.search.search_options;
		}
	},
	data(){
		return{
			loading:false,
			CreateItems:CreateItems,
			More:More,
			heads:[
			{name:'barcode',link:'barcode'},
			{name:'inventory_number',link:'inv_id'},
			{name:'batches_number',link:'batch_id'},
			{name:'author',link:'author'},
			{name:'titles',link:'title'},
			{name:'fill_date',link:'create_date',is_date:true},
			{name:'created_by',link:'created_by'},
			{name:'edited_by',link:'edited_by'},
			// edited by
			],
			editObj:{
				available:true,
				reCreate:true,
				lastCreated:this.lastCreated,
				component:CreateItems
			},
			deleteObj:{
				available:true,
				link:'/item/delete',
			},
			showMore:{
				available:true,
				title:'show_more',
				func:this.showit
			},
			pagination:true
		}
	},
	methods:{
		lastCreated(){
			this.pagination=false;
			this.$http.get('/item/last-created').then(response=>{
				this.$store.dispatch('setStore',{label:'items',data:{data:response.data,searching:true}});
			})
		},
		loadResults(){
			this.pagination=true;
			this.$store.dispatch('setStore',{label:'items',data:{page:0}});
			this.getResults('/item',this.items.search,'items')
		},
		loadSearchFields(){
			if(this.items.search_fields.length<1){
				this.$http.get('/item/search-fields').then(response=>{
					this.items.search_fields=response.data.res;
				})
			}
		},
		showit(info){
			let heads=[
			{name:'barcode',link:'barcode'},
			{name:'inventory_number',link:'inv_id'},
			{name:'batches_number',link:'batch_id'},
			{name:'isbn',link:'isbn'},
			{name:'author',link:'author'},
			{name:'titles',link:'title'},
			{name:'publishers',link:'publisher'},
			{name:'pub_year',link:'pub_year'},
			{name:'pub_city',link:'pub_city'},
			{name:'suppliers',link:'supplier'},
			{name:'cost',link:'cost'},
			{name:'currency',link:'currency'},
			{name:'type_of_item',link:'item_type'},
			{name:'type_of_supply',link:'sup_type'},
			{name:'location',link:'location_title'},
			{name:'fill_date',link:'create_date',is_date:true},
			{name:'created_by',link:'username'},
			];
			let props={
				data:info,
				heads:heads,
				width:'35%',
				editObj:this.editObj,
				deleteObj:this.deleteObj,
				link:'/item',
				commit:'items'
			};
			this.showModal(this.More,props);
		},
		addInput(input){
			this.inputs.push(input);
		},
		removeInput(input){
			this.inputs.splice(this.inputs.indexOf(input),1);
		}
	},
	created(){
		this.loadSearchFields();
	}
}
</script>
<style scoped>
.pad{
	padding:0.3125em;
}
.add_button-wrapper{
	min-width: 9.375em;
	width:25%;
}
.no_border_right{
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}

.no_border_left{
	border-top-left-radius: 0;
	border-bottom-left-radius: 0;
}

.width{
	min-width: 3.5em;
}

.double-width{
	min-width: 7em;
}

</style>