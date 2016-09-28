// 패키지 import 수행
var azure = require('azure-storage');
var blobService = azure.createBlobService('<저장소계정>', '<어카운트키>');

// blob 업로드 수행
blobService.createBlockBlobFromLocalFile('nodecontainer', 'AzureDC', 'azure_center.png', function(error, result, response) {
  publicAccessLevel: 'blob'
}, function(error, result, response) {
  if (!error) {
	console.log(response);
  } else {
	console.log(error);
  }
});