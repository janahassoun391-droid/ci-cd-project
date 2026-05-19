pipeline {
    agent any

    stages {

        stage('Clone Project') {
            steps {
                git 'https://github.com/janahassoun391-droid/ci-cd-project.git'
            }
        }

        stage('Build Docker Containers') {
            steps {
                sh 'docker compose up --build -d'
            }
        }

    }
}
