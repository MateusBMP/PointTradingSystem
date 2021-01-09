import { DomainEvent } from "../DomainEvent";
import { Port, Ship } from '../models';

/** Evento de partida */
export class DepartureEvent extends DomainEvent {
    private _port: Port;
    private _ship: Ship;

    /**
     * Constrói o evento de partida de um navio que está saindo de um porto.
     * @param ocurred Data de ocorrência
     * @param port Porto o qual o navio partiu
     * @param ship Navio partindo
     */
    constructor(ocurred: Date, port: Port, ship: Ship) {
        super(ocurred);
        this._port = port;
        this._ship = ship;
    }

    public process() {
        this.Ship.HandleDeparture(this);
    }

    get Port() {
        return this._port;
    }

    get Ship() {
        return this._ship;
    }
}