export default {
	setUser(state,data){
		state.user=data;
		if(Object.keys(data).length>0 || data.length>0){
			state.logged=true;
		}
		else{
			state.logged=false;
		}
	},
	setResults(state,data){
		state.results=data;
	},
	setQuery(state,data){
		state.query=data
	},
	setQueries(state,data){
		state.queries=data
	},
	setSearchType(state,data){
		state.search_type=data;
	},
	setFilters(state,data){
		state.selected.data=[];
		state.selected.all=false;
		state.filtering=false;
		state.filters=data;
		state.filter.types=copy(data.types);
		state.filter.year='';
	},
	setFiltering(state,data){
		state.filtering=data;
	},
	setLoading(state,data){
		state.loading=data;
	},
	setMedia(state,data){
		state.media.type=data.type;
		state.media.id=data.id;
	},
	setWrapperIndex(state,data){
		state.wrapperIndex=data;
	},
	setRequest(state,data){
		state.request=data;
	},
	setTypes(state,data){
		state.types=data
	}
}
