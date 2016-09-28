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
// console 프로젝트 또는 Azure WebJob 프로젝트 템플릿으로 프로젝트 생성
todo : 
```

### 크기조절 및 테스트
Web App 크기조절  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-scale/  
todo : 크기조절간 안정성을 위한 P&P TransientFaultHandling 관련 내용 정리

## Azure 데이터 저장소(Azure Data Storage)  
### Azure blob 저장소
Blob
- C#
- node.js
- PHP

### Azure table 저장소
Table
- C#
- node.js
- PHP

### Azure queue 저장소
Queue
- C#
- node.js
- PHP

### Azure files
내용 소개  

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
