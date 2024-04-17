from enum import Enum


class Raza(Enum):
    SUPERGUERRERO: str = "superguerrero"
    HUMANO: str = "humano"
    ANDROIDE: str = "androide"
    NAMEKIANO: str = "namekiano"


class GuerreroZ:

    guerreros = []

    def __init__(self, nombre: str, edad: int, ataques: dict, raza: Raza) -> None:
        self.nombre = nombre
        self.edad = edad
        self.ataques = ataques
        self.raza = raza

        self.guerreros.append(self)

    def ataqueMasPoderosoDeCadaGuerrero(self):
        return max(f"{nombre}:{valor}" for nombre, valor in self.ataques.items())

    @classmethod
    def cuantosPersonajesHayDeCadaRaza(self) -> dict:
        conteoPersonajesPorRaza = {}
        for guerrero in self.guerreros:
            razaActual = guerrero.raza.name
            if razaActual in conteoPersonajesPorRaza:
                conteoPersonajesPorRaza[razaActual] += 1
            else:
                conteoPersonajesPorRaza[razaActual] = 1

        return conteoPersonajesPorRaza

    def __str__(self) -> str:
        return f"Nombre: {self.nombre}\nEdad: {self.edad}\nAtaques: {self.ataques}\nRaza: {self.raza.name}"


goku = GuerreroZ(
    "Goku", 17, {"KameHame": 100, "SuperKameHame": 500}, Raza.SUPERGUERRERO
)

vegeta = GuerreroZ(
    "Vegeta", 17, {"CanoGarlick": 100, "FinalFlash": 500}, Raza.SUPERGUERRERO
)

corpetit = GuerreroZ(
    "Corpetit", 17, {"CanoGarlick": 100, "FinalFlash": 500}, Raza.NAMEKIANO
)

fullet_tortuga = GuerreroZ(
    "Fullet Tortuga", 17, {"CanoGarlick": 100, "FinalFlash": 500}, Raza.HUMANO
)


print(goku)

print(goku.ataqueMasPoderosoDeCadaGuerrero())

print(vegeta.ataqueMasPoderosoDeCadaGuerrero())

print(GuerreroZ.cuantosPersonajesHayDeCadaRaza())
