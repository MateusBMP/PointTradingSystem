import { DomainEvent } from "../DomainEvent";
import { Port, Ship } from '../models';

/** Evento de chegada */
export class ArrivalEvent extends DomainEvent {
    private _port: Port;
    private _ship: Ship;

    /**
     * Constrói o evento de chegada de um navio que está chegando em um porto.
     * @param ocurred Data de ocorrência
     * @param port Porto o qual o navio chegou
     * @param ship Navio que chegou
     */
    constructor(ocurred: Date, port: Port, ship: Ship) {
        super(ocurred);
        this._port = port;
        this._ship = ship;
    }

    public process() {
        this.Ship.HandleArrival(this);
    }

    get Port() {
        return this._port;
    }

    get Ship() {
        return this._ship;
    }
}