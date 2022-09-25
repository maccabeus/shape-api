# Simple Geometry API

A simple Geometry Api built with `PHP 8+` and `Symfony`.

## Running a Test

To run all the application test, run the following command:

```bash
make test
```

upi can also run the following command `PhpUnit` command to run the test

```bash
php bin/phpunit

```

## Creating Docker Image

To create the `Docker Image` of the application, run the following command.

```bash
docker build -t shape/shape-api .
```

You can also use the `Make` command to perform the same operation

```bash
make docker
```

## Running the application server

To run the application server, you can use any of the two commands below. You can use `docker-compose` commands o `docker run` command directly. Note that the app by default will be available at `http://localhost:8000`

### Running docker Directly

To run docker directly, use the following command:

```bash
docker run -p 4000:8000 shape/shape-api
```

Also, you can use the following `Make` command to run you application server

### Running via docker compose

After a successful build, from the same terminal run the following command to start:

```bash
$  docker-compose up
```

## Microservices?

### A brief Overview

Microservice is a software architectural style that models and structures application as a collection of highly maintainable and testable units, loosely coupled to ensure service abstraction, independently deployable, organization around business capabilities and domain, while allowing smaller engineering team to manage varying application units.

This architectural pattern enables rapid, frequent and reliable delivery of large, complex applications. It also enables an organization to evolve its technology stack while minimizing reducing the application failure plane.

### Microservice Architecture Communication.

There are some couple of architectural patterns that can be utilized to implement microservice communication, but we will looks at major challenges that must be significant consideration before implementation:

The data base model selected: this will include the type of database type choice made during the application development. Some of this will include the type `(RDBMS, NoSQL, or GraphDB)` with each offering different level of adherence to the `CAP theorem` of Consistency, Availability, and Partitioning.
Fault and Partial failures: The distributed nature of micro services makes it a key candidate for system failure, and this must be considered in communication pattens design as this will determine data consistency and durability, two major issues in transaction management.
`Network failure: `communication pattern. Should be design to accommodate and make provision for network failure. Having an acknowledgment system in the messaging pattern is a key feature that must be adhere to.
`Unreliable clocks:` clock timestamps varies from region to region, and for application running on the cloud, this is a crucial consideration while development `communication pattern` as this affect will affect `data cluster consistency`, and `regional data replication`.

### Developing Microservice Communication.

We will have a `High Level Overview` of the implementation of the major `four` communication pattern in `microservice architecture`.

### Remote Procedure Invocation (RPI):

This pattern will involve the use of `REST API, gRPC/ RPC , or Apache thrift`. This is use majorly for `inter-service communication`, also exposed the service to external consumers. The consumer uses a request / reply-based protocol to make requests to a service and must wait for the response to be delivered. The non duplex nature of this pattern makes it less desirable for bi-directional data flow, like we will see in subsequent pattern. Each service domain with the microservice cluster will expose an Invocation endpoint. We will also implement a `service discovery mechanism` using `Zookeeper` for consumers to discover available services.

#### Messaging Pattern:

This pattern allow duplex, or bidirectional data flow within our services. This will use an asynchronous messaging through communication channels. There are Some of the tool to use are apache `Kafka, RabbitMq, or even Redis` pub-sub, with`ack- message acknowledgment system ` built into most of the aforementioned tools. This will be use for `Notification- One way`, `Request and Response - One to One`, and `Publication and Subscription -One` to Many.

#### Domain-specific Protocol:

In this pattern, we will use domain specific services/ protocol domain-specific protocol for inter-service communication. These include email protocols like `SMTP and IMAP `and media streaming protocols such as` RTMP, HLS, and HDS`. This will be implemented both for notification and on demand or real-time content request. This request `will be asynchronous`, and some will be batched and run on a separate thread from the main application thread.

#### Idempotent Consumer:

For `idempotent management`, we will also implement of `acknowledgment` on the client side to track the `ID` of the messages processed. This is will give us us the opportunity to reprocess a lost message, or `acknowledgment` the receipt event message event after network failure. This will allow the to consumer that can handle duplicate messages correctly. Some consumers are naturally idempotent. But for others, we must track the messages that they have processed in order to detect and discard duplicates.

## Cheers!
