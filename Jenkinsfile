pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git credentialsId: 'github-credentials', url: 'https://github.com/Unta007/inventory-management.git'
            }
        }
        stage('Pull Existing Docker Image') {
            steps {
                script {
                    // Pull the existing Docker image
                    docker.image("fauzan-inventoryeskrimo:latest").pull()
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    // Run tests inside the pulled Docker image
                    docker.image("fauzan-inventoryeskrimo:latest").inside {
                        sh 'npm test' // Replace with your actual test command
                    }
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    // Deploy the Docker image (this could be pushing to a registry or running it)
                    // Example: Running the container
                    docker.image("fauzan-inventoryeskrimo").run('-d -p 8080:8080') // Adjust as needed
                }
            }
        }
    }
}
