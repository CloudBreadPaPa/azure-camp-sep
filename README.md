# azure camp sep
이 repo는 2016년 9월 예정된 Azure dev camp 2일차 PaaS 과정에 대한 코드와 hands on 자료를 제공  

## Application 개발을 위한 Azure App Service  
### Web App / API app / Mobile App 생성과 배포

### Demo : 웹앱 생성  
- Azure Portal에 로그온 후 리소스 그룹을 생성  
https://azure.microsoft.com/en-us/documentation/articles/resource-group-portal/  

- Web App을 생성  
https://azure.microsoft.com/en-us/documentation/articles/app-service-web-get-started/  

### Source control
- 생성한 Web App에서 FTP, Git, Github 등으로 배포  
FTP : https://azure.microsoft.com/en-us/documentation/articles/web-sites-deploy/  
Git : https://azure.microsoft.com/en-us/documentation/articles/app-service-deploy-local-git/  
```
git init  
git add .  
git commit -m "initial commit"  
git remote add azure [URL for remote repository]  
git push azure master  
//코드 수정 작업 후  
git add .  
git commit -m "second commit"  
git push azure master  
//배포 확인  
```
Github : https://azure.microsoft.com/en-us/documentation/articles/app-service-web-arm-from-github-provision/  
```
repo를 github에 생성  
Azure portal에서 연속 배포 설정  
설정 후 github의 repo를 Azure Portal에서 지정  
```

### 다양한 언어 지원
- Web App과 C# - ASP.NET
https://azure.microsoft.com/en-us/documentation/articles/web-sites-dotnet-get-started/  
```
VS에서 ASP.NET 프로젝트 생성  
빌드, 디버그, 실행  
생성된 Project를 VS에서 게시 수행  
```

- Web App과 PHP  
https://azure.microsoft.com/en-us/documentation/articles/app-service-web-php-get-started/  
```
index.php 생성  
phpinfo() 코드 추가  
WebMatrix 또는 git을 이용해 publish 수행  
Web App 설정에서 php version 및 php 관련 cofnig 수행  
```


- Web App과 node.js  
https://azure.microsoft.com/en-us/documentation/articles/app-service-web-nodejs-get-started/  
```
app.js 생성  
console.log 코드 추가  
git 등을 이용해 publish 수행  
```

- Web App과 Python  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-python-ptvs-django-mysql/  
```
//todo  
```
- Web App과 Java  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-java-get-started/  
```
//todo  
```

### Demo : WebJobs  
백그라운드에서 수행되는 작업을 WebJob 으로 실행  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-create-web-jobs/  

#### script로 수행
```
// http://requestb.in/ 사이트를 이용해 webjob을 inpection  
// req.php 파일 생성  
<?php  
    $result = file_get_contents('http://requestb.in/경로');  
    echo $result;  
?>  

// settings.job 파일 생성  
{  
  "schedule": "0 */2 * * * *"  
}  

// 두 파일을 zip으로 묶은 후 webjob으로 업로드  
```

#### C# 프로젝트로 데모 수행
Deploy WebJobs using Visual Studio  
https://azure.microsoft.com/en-us/documentation/articles/websites-dotnet-deploy-webjobs/  

```
// demo\webjob-cs-with-webapp 프로젝트 참조  
// console 프로젝트 또는 Azure WebJob 프로젝트 템플릿으로 프로젝트 생성  
// ASP.NET web project 생성 후 추가로 console project 생성  
// console project에서 reqeustb.in을 이용해 요청 테스트  
// Web rpoject에서 console 프로젝트를 webjob으로 추가  
// Web App 배포 수행  
```

### 크기조절 및 테스트
Web App 크기조절  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-scale/  
```
// Web App의 App Service Plan과 크기조절
```
참고정보 : Pattern & Practice - Transient Fault Handling  
https://msdn.microsoft.com/en-us/library/dn440719(v=pandp.60).aspx 

## Azure 데이터 저장소(Azure Data Storage)  
### Azure blob 저장소
#### C# 코드  
참고링크 : https://azure.microsoft.com/en-us/documentation/articles/storage-dotnet-how-to-use-blobs/  
```
public static void CreateContainer()
{
    // 저장소 연결 문자열 처리
    CloudStorageAccount storageAccount = CloudStorageAccount.Parse(
        CloudConfigurationManager.GetSetting("StorageConnectionString"));

    // client 개체 생성
    CloudBlobClient blobClient = storageAccount.CreateCloudBlobClient();

    // 컨테이너 개체 참조
    CloudBlobContainer container = blobClient.GetContainerReference("mycontainer");

    // 컨테이너가 없으면 생성
    container.CreateIfNotExists();

    return;
}
```

#### node.js
```
// 아래 링크에서 정보 확인 https://azure.microsoft.com/en-us/documentation/articles/storage-nodejs-how-to-use-blob-storage/

// 설치
// npm install azure-storage

// 패키지 import 수행
var azure = require('azure-storage');

// connection string 작업 
// environment variable을 구성 | Azure 위에서 구성도 가능
var tableService = azure.createTableService('<저장소이름>', '<저장소키>');

// 테이블 생성
tableService.createTableIfNotExists('nodetable', function(error, result, response) {
  if (!error) {
    // 수행완료
	console.log('ok');
	console.log(response);
  } else {
	  console.log(error);
  }
});
```
#### PHP
```
<?php
// composer를 이용해 PHP Azure client를 설치
// https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-blobs/

require_once 'vendor\autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\PublicAccessType;
use WindowsAzure\Common\ServiceException;

// https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-blobs/

// Storage의 connection string 제공
$connectionString = "DefaultEndpointsProtocol=http;AccountName=<저장소이름>;AccountKey=<저장소키>";

// REST proxy 생성
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$createContainerOptions = new CreateContainerOptions();

//setPublicAccess 접근 정책 설정

// CONTAINER_AND_BLOBS:
// 전체 엑세스 권한
//
// BLOBS_ONLY:
// blob들에 대해서만 읽기 권한. 
$createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

// 컨테이너 메타데이터 설정
$createContainerOptions->addMetaData("VSTechUp", "Visual Studio");
$createContainerOptions->addMetaData("Azure", "Cloud");

try {
    // 컨테이너 생성
    $blobRestProxy->createContainer("phpcontainer", $createContainerOptions);
}
catch(ServiceException $e){
    // 에러 핸들링
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

?>

```

### Azure table 저장소
#### C# 코드  
참고링크 : https://azure.microsoft.com/en-us/documentation/articles/storage-dotnet-how-to-use-tables/
```
// 저장소 연결 문자열 처리
CloudStorageAccount storageAccount = CloudStorageAccount.Parse(
    CloudConfigurationManager.GetSetting("StorageConnectionString"));

// table 클라이언트 개체 생성
CloudTableClient tableClient = storageAccount.CreateCloudTableClient();

// 테이블 참조 설정 
CloudTable table = tableClient.GetTableReference("people");

// 테이블이 존재하지 않으면 생성
table.CreateIfNotExists();
```
#### node.js
```
// 아래 링크에서 정보 확인 https://azure.microsoft.com/en-us/documentation/articles/storage-nodejs-how-to-use-blob-storage/

// 설치
// npm install azure-storage

// 패키지 import 수행
var azure = require('azure-storage');

// connection string 작업 
// environment variable을 구성 | Azure 위에서 구성도 가능
var tableService = azure.createTableService('<저장소계정>', '<저장소키>');

// 테이블 생성
tableService.createTableIfNotExists('nodetable', function(error, result, response) {
  if (!error) {
    // 수행완료
	console.log('ok');
	console.log(response);
  } else {
	  console.log(error);
  }
});
```

#### PHP
```
<?php
// https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-table-storage/
require_once 'vendor\autoload.php';
//ini_set('display_errors', 1);
//error_reporting(~0);

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

// Storage의 connection string 제공
$connectionString = "DefaultEndpointsProtocol=http;AccountName=<저장소계정>;AccountKey=<어카운트키>";

// Azure의 table storage를 위한 REST proxy 생성
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

/////////////////////////////////////////////////////////////////
// 01 테이블 생성
/////////////////////////////////////////////////////////////////
try {
    // 테이블 생성
    $tableRestProxy->createTable("phptable");
}
catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
?>
```

### Azure queue 저장소
#### C# 참고링크
https://azure.microsoft.com/en-us/documentation/articles/storage-dotnet-how-to-use-queues/  
```
public static void CreateQueue()
{
    // 연결 문자열 처리
    CloudStorageAccount storageAccount = CloudStorageAccount.Parse(
        CloudConfigurationManager.GetSetting("StorageConnectionString"));

    // 큐 클라이언트 개체 생성
    CloudQueueClient queueClient = storageAccount.CreateCloudQueueClient();

    // 큐 참조 설정
    CloudQueue queue = queueClient.GetQueueReference("myqueue");

    // 큐가 없으면 생성
    queue.CreateIfNotExists();
}
```

#### node.js 참고링크
https://azure.microsoft.com/en-us/documentation/articles/storage-nodejs-how-to-use-queues/  
```
todo
```

#### PHP 참고링크
https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-queues/  
```
todo
```

### Azure files
참고링크 : https://azure.microsoft.com/en-us/documentation/articles/storage-dotnet-how-to-use-files/  
주의사항으로, outbound 445 가 열려 있어야 하는 제한이 있으며, ISP에 따라서 다름.  

## Azure SQL 데이터 베이스(SQL Database)  
### SQL Database
소개 및 생성
- VS 또는 SSMS에서 연결
- SQL Database vs VM
- Elastic Pool
- OSS에서 연결 : https://azure.microsoft.com/en-us/documentation/articles/sql-database-libraries/  

### DocumnetDB
소개  
NoSQL tutorial: Build a DocumentDB C# console application  
https://azure.microsoft.com/en-us/documentation/articles/documentdb-get-started-quickstart/

### HDInsight
소개  
Hadoop tutorial: Get started using Hadoop in HDInsight on Windows  
https://azure.microsoft.com/en-us/documentation/articles/hdinsight-hadoop-tutorial-get-started-windows/  
Hadoop tutorial: Get started using Linux-based Hadoop in HDInsight  
https://azure.microsoft.com/en-us/documentation/articles/hdinsight-hadoop-linux-tutorial-get-started/  

## Azure Machine Learning
### Machine Learning 소개
### 모델 생성
### 학습 모델
### 서비스 생성 및 API로 사용
