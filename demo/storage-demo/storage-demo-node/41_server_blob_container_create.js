// 패키지 import 수행
var azure = require('azure-storage');

var blobService = azure.createBlobService('<저장소계정>', '<어카운트키>');

// blob 컨테이너 생성, Access Level은 blob
blobService.createContainerIfNotExists('nodecontainer', {
  publicAccessLevel: 'blob'
}, function(error, result, response) {
  if (!error) {
	console.log(response);
  } else {
	console.log(error);
  }
});