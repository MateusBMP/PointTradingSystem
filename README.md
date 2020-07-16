# Point Trading System

Esse é um estudo de implementação sobre o artigo [Using Event Sourcing and CQRS to Build a High Performance Point Trading System](https://dl.acm.org/doi/10.1145/3317614.3317632).

---

Yifan Zhong, Wei Li, and Jing Wang. 2019. Using Event Sourcing and CQRS to Build a High Performance Point Trading System. In Proceedings of the 2019 5th International Conference on E-Business and Applications (ICEBA 2019). Association for Computing Machinery, New York, NY, USA, 16–19. DOI:https://doi.org/10.1145/3317614.3317632
  

## Abstract

Point system is a common application in loyalty marketing programs. However, points are usually difficult to be obtained so that consumers have a small amount of points and participate in marketing campaigns rarely. To promote consumer engagement, this paper proposes a new method that combines point trading with third-party payment, supporting more forms of marketing strategy. Trading subsystem is the core part of point system. Traditional trading subsystem architecture is faced with resource competition and database deadlock problems so that it cannot meet the performance requirements. Using the Actor model, event sourcing and CQRS pattern, both the performance and scalability of the system can be improved. Tests have shown that this architecture does bring performance gains.
