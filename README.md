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

- Web App과 PHP  
https://azure.microsoft.com/en-us/documentation/articles/app-service-web-php-get-started/  

- Web App과 node.js  
https://azure.microsoft.com/en-us/documentation/articles/app-service-web-nodejs-get-started/  

- Web App과 Python  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-python-ptvs-django-mysql/  

- Web App과 Java  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-java-get-started/  

### Demo : WebJobs  
백그라운드에서 수행되는 작업을 WebJob 으로 실행  
https://azure.microsoft.com/en-us/documentation/articles/web-sites-create-web-jobs/  
todo : web job 스크립트 기반 관련 내용 업데이트  
- C# 프로젝트 데모


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
