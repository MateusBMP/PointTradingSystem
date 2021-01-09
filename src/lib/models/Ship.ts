import { ArrivalEvent, DepartureEvent } from '../events';
import { Port } from './Port';
import { Port as DataPort } from '../data';

/** Objeto modelo Navio */
export class Ship {
    public Name: string;
    public Port: Port;

    /**
     * Constrói o objeto Navio com seu nome e porto inicial Nulo.
     * @param name Nome do Navio
     */
    constructor(name: string) {
        this.Name = name;
        this.Port = DataPort.NULL;
    }

    /**
     * Manipula o evento de partida do navio.
     * @param ev 
     */
    public HandleDeparture(ev: DepartureEvent) {
        this.Port = DataPort.AT_SEA;
    }

    /**
     * Manipula o evento de chegada do navio.
     * @param ev
     */
    public HandleArrival(ev: ArrivalEvent) {
        this.Port = ev.Port;
    }
}