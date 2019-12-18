export const LocalConfiguration = {
	
	ApiEndPoint: function(){
		// const EndPoints = {
		// 	'LOCAL_ApiEndPoint': 'http://localhost:8000',
		// 	'DEV_ApiEndPoint': 'http://dev.pagcor-blueberry.com',
		// 	'KIMG_ApiEndPoint': 'http://dev.pagcor-blueberry.com',
		// 	'UAT_ApiEndPoint': 'http://uat.api.beachheadsolutionsinc.com',
		// 	'PROD_ApiEndPoint': 'http://app.api.beachheadsolutionsinc.com',
		// 	'PAGCOR_ApiEndPoint': 'http://bo-ploutus-api.globalcomrci.com' // REMOVE THIS WHEN PAGCOR HAS ITS OWN REPO			
		// };
		return process.env.NODE_ENV_ENDPOINT;
	},

}